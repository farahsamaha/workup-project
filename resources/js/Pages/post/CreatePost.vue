<template>
  <v-card
    elevation="5"
    class="mx-auto my-9 black--text"
    width="700"
    height="450"
  >
    <v-card-actions>
      <v-container>
        <v-col class="mx-auto">
          <v-list-item class="grow mt-4">
            <v-list-item-avatar color="grey darken-3">
              <v-img
                class="elevation-6 profile h-8 w-8 rounded"
                :alt="$page.props.auth.user.name"
                :src="$page.props.auth.user.featured_image"
              ></v-img>
            </v-list-item-avatar>

            <v-list-item-content>
              <v-list-item-title>
                {{ $page.props.auth.user.name }}</v-list-item-title
              >
            </v-list-item-content>
          </v-list-item>
        </v-col>
      </v-container>
    </v-card-actions>
    <v-row>
      <v-col cols="10" class="mx-auto">
        <form @submit.prevent="store">
          <v-textarea
            v-model="form.content"
            placeholder="type what you think about !"
            clearable
            clear-icon="mdi-close-circle"
          ></v-textarea>
          <v-row
            ><v-col cols="10">
              <v-btn dark color="teal accent-4" class="mx-4 my-7" type="submit">
                <v-icon>mdi-post</v-icon>Post
              </v-btn></v-col
            >
            <v-col cols="2">
              <v-btn fab dark large color="orange" class="mr-5 mt-2">
                <v-file-input
                  large
                  class="ml-5 mb-3"
                  dark
                  prepend-icon="mdi-camera"
                  hide-input
                  :rules="rules"
                  v-model="form.image"
                  accept="image/png, image/jpg, image/bmp"
                ></v-file-input>
              </v-btn> </v-col
          ></v-row>
        </form>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  remember: "form",
  data() {
    return {
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
      rules: [
        (value) =>
          !value ||
          value.size < 2000000 ||
          "Avatar size should be less than 2 MB!",
      ],

      form: this.$inertia.form({
        content: "",
        image: "",
      }),
    };
  },
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

  props: {
    user: Object,
    can: Object,
  },

  methods: {
    store() {
      this.form.post("/posts");
    },
  },
};
</script>

<style>
#create .v-speed-dial {
  position: absolute;
}

#create .v-btn--floating {
  position: relative;
}
</style>
