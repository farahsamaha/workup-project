<template>
  <v-card
    class="mx-auto my-9 black--text"
    color="#f3f3f3"
    width="600"
    height="450"
  >
    <v-card-actions>
      <v-container>
        <v-col class="mx-auto">
          <v-list-item class="grow mt-4">
            <v-list-item-avatar color="grey darken-3">
              <v-img
                class="elevation-6"
                alt=""
                src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
              ></v-img>
            </v-list-item-avatar>

            <v-list-item-content>
              <v-list-item-title> user name</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-col>
      </v-container>
    </v-card-actions>
    <v-row>
      <v-col cols="10" class="mx-auto">
        <v-textarea
          placeholder="type what you think about !"
          clearable
          clear-icon="mdi-close-circle"
        ></v-textarea>
        <v-row
          ><v-col cols="10">
            <v-btn  dark  color="teal accent-4" class="mx-4 my-7" >
              <v-icon>mdi-pen</v-icon>Post
            </v-btn></v-col
          >
          <v-col cols="2">
            <v-speed-dial
              class="mt-9"
              v-model="fab"
              :top="top"
              :bottom="bottom"
              :right="right"
              :left="left"
              :direction="direction"
              :open-on-hover="hover"
              :transition="transition"
            >
              <template v-slot:activator>
                <v-btn v-model="fab" color="teal accent-4" dark fab right>
                  <v-icon v-if="fab"> mdi-close </v-icon>
                  <v-icon v-else> mdi-plus </v-icon>
                </v-btn>
              </template>
              <v-btn fab dark small color="blue">
                <v-icon>mdi-camera</v-icon>
              </v-btn>
              <v-btn fab dark small color="red">
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </v-speed-dial></v-col
          ></v-row
        >
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  data: () => ({
    direction: "left",
    fab: false,
    fling: false,
    hover: false,
    tabs: null,
    top: false,
    right: false,
    bottom: true,
    left: false,
    transition: "slide-x-reverse-transition",
  }),

  watch: {
    top(val) {
      this.bottom = !val;
    },
    right(val) {
      this.left = !val;
    },
    bottom(val) {
      this.top = !val;
    },
    left(val) {
      this.right = !val;
    },
  },
};
</script>

<style>
/* This is for documentation purposes and will not be needed in your application */
#create .v-speed-dial {
  position: absolute;
}

#create .v-btn--floating {
  position: relative;
}
</style>
