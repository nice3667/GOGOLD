<template>
  <section class="overflow-auto">
    <h1>Buttons</h1>
    <div class="flex items-center space-x-2">
      <button class="btn btn-Button1 btn-button1">text</button>
      <button class="btn btn-Button2 btn-button1">text</button>
      <button class="btn btn-Button3 btn-button1">text</button>
      <button class="btn1 btn-Button4 btn-button1">text</button>
    </div>
    s

    <h2 class="mt-3">Table Buttons</h2>
    <div class="flex items-center mt-3 space-x-2">
      <button class="btn-tb btn-table btn-paid">text</button>
      <button class="bg-yellow-500 icon-button">
        <img src="@/assets/icon/edit-icon.svg" alt="" />
      </button>
      <button class="bg-yellow-500 icon-button">
        <img src="@/assets/icon/search-icon.svg" alt="" />
      </button>
      <button class="bg-red-500 icon-button">
        <img src="@/assets/icon/bin-icon.svg" alt="" />
      </button>
    </div>
    <div>
      <h2 class="mt-3">Vuetify Button</h2>
      <v-container class="bt-color" fluid>
        <v-row class="bt-colorrow">
          <v-col cols="12" sm="6" md="4">
            <v-btn
              color="#FFD700"
              variant="elevated"
              text="text"
              size="large"
              min-width="300"
              rounded="xl"
              class="bt1"
            >
            </v-btn>
          </v-col>
        </v-row>
        <div>
          <div class="text-center pa-4">
            <v-dialog v-model="dialog" max-width="600">
              <template v-slot:activator="{ props: activatorProps }">
                <v-btn
                  class="text-none font-weight-regular"
                  prepend-icon="mdi-account"
                  text="Edit Profile"
                  variant="tonal"
                  v-bind="activatorProps"
                ></v-btn>
              </template>

              <v-card prepend-icon="mdi-account" title="User Profile">
                <v-card-text>
                  <v-row dense>
                    <v-col cols="12" md="4" sm="6">
                      <v-text-field label="First name*" required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4" sm="6">
                      <v-text-field
                        hint="example of helper text only on focus"
                        label="Middle name"
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4" sm="6">
                      <v-text-field
                        hint="example of persistent helper text"
                        label="Last name*"
                        persistent-hint
                        required
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4" sm="6">
                      <v-text-field label="Email*" required></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4" sm="6">
                      <v-text-field
                        label="Password*"
                        type="password"
                        required
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="4" sm="6">
                      <v-text-field
                        label="Confirm Password*"
                        type="password"
                        required
                      ></v-text-field>
                    </v-col>

                    <v-col cols="12" sm="6">
                      <v-select
                        :items="['0-17', '18-29', '30-54', '54+']"
                        label="Age*"
                        required
                      ></v-select>
                    </v-col>

                    <v-col cols="12" sm="6">
                      <v-autocomplete
                        :items="[
                          'Skiing',
                          'Ice hockey',
                          'Soccer',
                          'Basketball',
                          'Hockey',
                          'Reading',
                          'Writing',
                          'Coding',
                          'Basejump',
                        ]"
                        label="Interests"
                        auto-select-first
                        multiple
                      ></v-autocomplete>
                    </v-col>
                  </v-row>

                  <small class="text-caption text-medium-emphasis"
                    >*indicates required field</small
                  >
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                  <v-spacer></v-spacer>

                  <v-btn
                    text="Close"
                    variant="plain"
                    @click="dialog = false"
                  ></v-btn>

                  <v-btn
                    color="primary"
                    text="Save"
                    variant="tonal"
                    @click="dialog = false"
                  ></v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </div>
        </div>
      </v-container>
    </div>
  </section>
</template>

<script>
export default {
  name: "Button",
  data: () => ({
    dialog: false,
  }),
};
</script>
