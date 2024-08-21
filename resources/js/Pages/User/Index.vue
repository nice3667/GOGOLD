<template>
  <div>
    <Toolbar />
  </div>
  <div>
    <BodyHomepage />
  </div>
  <div>
    <TableHomepage />
  </div>
</template>
<script>
import Toolbar from "@/components/Homepage/Toolbar.vue";
import BodyHomepage from "@/components/Homepage/BodyHomepage.vue";
import TableHomepage from "@/components/Homepage/TableHomepage.vue";
export default {
  name: "Homepage",
  components: {
    Toolbar,
    BodyHomepage,
    TableHomepage,
  },
};
</script>
<style></style>
