<template>
  <v-app>
    <v-app-bar
      app
      elevation="0"
      height="60px"
      fixed
      scroll-target="#scrolling-techniques"
    >
      <v-btn
        elevation="0"
        text
        height="40"
        width="150"
        :href="route('home')"
        @click.prevent="$inertia.visit(route('home'))"
      >
        <v-img
          class="mx-2 ml-5"
          src="/assets/logo2.png"
          max-height="100"
          max-width="130"
          contain
        >
        </v-img
      ></v-btn>
      <v-spacer></v-spacer>
      <div v-if="canLogin" class="fixed top-0 right-0 px-6 py-4 sm:block">
        <v-row>
          <!-- <v-btn
            class="d-flex justify-center justify-space-around mr-3 teal--text"
            large
            text
            height="35"
            v-if="$page.props.auth.user"
            :href="route('dashboard')"
          >
            Dashboard
          </v-btn> -->
          <v-btn
            class="d-flex justify-center justify-space-around mr-3 teal--text"
            large
            text
            height="35"
            :href="route('login')"
            @click.prevent="$inertia.visit(route('login'))"
          >
            Log in
          </v-btn>
          <v-btn
            class="d-flex justify-center justify-space-around mr-3 teal--text"
            large
            text
            height="35"
            v-if="canRegister"
            :href="route('register')"
            @click.prevent="$inertia.visit(route('register'))"
          >
            Register</v-btn
          >
        </v-row>
      </div>
      <v-btn
        icon
        @click.prevent="$vuetify.theme.dark = !$vuetify.theme.dark"
        class="teal--text"
      >
        <v-icon v-if="!$vuetify.theme.dark"> mdi-weather-night </v-icon>
        <v-icon v-else> mdi-white-balance-sunny </v-icon>
      </v-btn>
    </v-app-bar>
    <v-main class="mb-12">
      <slot />
    </v-main>
    <footer-sec />
  </v-app>
</template>

<script>
import FooterSec from "@/components/partials/FooterSec.vue";

export default {
  components: { FooterSec },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
