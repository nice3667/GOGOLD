import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";
import { VitePWA } from "vite-plugin-pwa";

export default () => {
  // Define the icons in the Laravel public folder that:
  // 1. we want to include in the webmanifest, AND
  // 2. we want the service worker to pre-cache for offline use.
  // The src is a web URL relative to the public dir.
  // This is the data structure returned by @vite-pwa/assets-generator
  const manifestIcons = [
    {
      src: "./../logo/manifest-icon-192.maskable.png",
      sizes: "192x192",
      type: "image/png",
      purpose: "any",
    },
    {
      src: "./../logo/manifest-icon-192.maskable.png",
      sizes: "192x192",
      type: "image/png",
      purpose: "maskable",
    },
    {
      src: "./../logo/manifest-icon-512.maskable.png",
      sizes: "512x512",
      type: "image/png",
      purpose: "any",
    },
    {
      src: "./../logo/manifest-icon-512.maskable.png",
      sizes: "512x512",
      type: "image/png",
      purpose: "maskable",
    },
  ];

  // Define the icons in the Laravel public folder that:
  // 1. we don't need in the webmanifest, BUT
  // 2. we still want the service worker to pre-cache for offline use
  // The src is a web URL relative the public dir.
  const publicIcons = [{ src: "/favicon.png" }];

  // Define any additional images in the Laravel public folder that are not
  // packaged via Vite and that we want to be available offline. (For example,
  // an image used in a meta og:image tag). The src is a web URL relative to
  // the public root.
  // Use the format { src: '' } for entries
  const additionalImages = [];

  return defineConfig({
    resolve: {
      alias: {
        "ziggy-js": path.resolve("vendor/tightenco/ziggy/dist/vue.es.js"),
      },
    },
    plugins: [
      laravel({
        input: ["resources/js/app.js", "resources/scss/app.scss"],
        refresh: true,
        postcss: [tailwindcss(), autoprefixer()],
      }),
      vue({
        template: {
          transformAssetUrls: {
            base: null,
            includeAbsolute: false,
          },
        },
      }),
      VitePWA({
        // Make the PWA plugin build to the same place as laravel/vite-plugin
        buildBase: "/build/",

        // Define the scope and the base so that the PWA can run from the
        // root of the domain, even though the files live in /build.
        // This requires the service worker to be served with
        // a header `Service-Worker-Allowed: /` to authorise it.
        // @see server.php
        scope: "/",
        base: "/",

        // Use 'prompt' for new versions of the PWA. 'autoUpdate' is
        // simpler but may as well demo how this works.
        registerType: "prompt",

        // Do not use the PWA with dev builds.
        devOptions: {
          enabled: false,
        },

        // The Vite PWA docs suggest you should use includeAssets for
        // icons that are not in the manifest. But laravel/vite-plugin
        // does not use a public dir in the build - it relies on
        // Laravel's. If we add this as a publicDir to vite's config
        // then vite-plugin-pwa finds everything in public (eg if you are
        // using telescope then all its assets get cached). It then adds
        // these assets to the service worker with the `/build` prefix,
        // which doesn't work. I found it easiest to leave this empty
        // and use `additionalManifestEntries` below.
        includeAssets: [],

        workbox: {
          // Add all the assets built by Vite into the public/build/assets
          // folder to the SW cache.
          globPatterns: [
            "**/*.{js,css,html,ico,jpg,png,svg,woff,woff2,ttf,eot}",
          ],

          // Define the root URL as the entrypoint for the offline app.
          // vue-router can then takes over and shows the correct page
          // if you are using it.
          navigateFallback: "/",

          // Stops various paths being intercepted by the service worker
          // if they're not available offline. Telescope is a good
          // example, if you are using that.
          navigateFallbackDenylist: [/^\/telescope/],

          // Add some explicit URLs to the SW precache. This helps us
          // work with the laravel/vite-plugin setup.
          additionalManifestEntries: [
            // Cache the root URL to get hold of the PWA HTML entrypoint
            // defined in welcome.blade.php. Ref:
            // https://github.com/vite-pwa/vite-plugin-pwa/issues/431#issuecomment-1703151065
            { url: "/", revision: `${Date.now()}` },

            // Cache the icons defined above for the manifest
            ...manifestIcons.map((i) => {
              return { url: i.src, revision: `${Date.now()}` };
            }),

            // Cache the other offline icons defined above
            ...publicIcons.map((i) => {
              return { url: i.src, revision: `${Date.now()}` };
            }),

            // Cache any additional images defined above
            ...additionalImages.map((i) => {
              return { url: i.src, revision: `${Date.now()}` };
            }),
          ],

          // Ensure the JS build does not get dropped from the cache.
          // This allows it to be as big as 3MB
          maximumFileSizeToCacheInBytes: 3000000,
        },

        // Manifest settings - these will appear in the generated manifest.webmanifest
        manifest: {
          // Metadata
          name: "GoGold",
          short_name: "GoGold",
          description: "GoGold Forex Trading",
          theme_color: "#DE9918",
          background_color: "#DE9918",
          orientation: "portrait",
          display: "standalone",
          scope: "/",
          start_url: "/",
          id: "/",

          // These icons are used when installing the PWA onto a home screen
          icons: [...manifestIcons],
        },
      }),
    ],
  });
};
