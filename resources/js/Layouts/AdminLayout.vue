<template>
  <v-app>
    <v-app-bar
      app
      light
      elevation="0"
      height="60px"
      fixed
      scroll-target="#scrolling-techniques"
    >
      <v-app-bar-title>
        <v-btn elevation="0" text height="40" width="150">
          <v-img
            class="mx-2 ml-5"
            src="../assets/logo2.png"
            max-height="100"
            max-width="130"
            contain
          ></v-img
        ></v-btn>
      </v-app-bar-title>
      <v-spacer></v-spacer>
      <v-btn
        icon
        @click="$vuetify.theme.dark = !$vuetify.theme.dark"
        class="teal--text"
      >
        <v-icon v-if="!$vuetify.theme.dark"> mdi-weather-night </v-icon>
        <v-icon v-else> mdi-white-balance-sunny </v-icon>
      </v-btn>
      <!-- <v-app-bar-nav-icon @click="drawer = !drawer" /> -->
    </v-app-bar>

    <side-bar :key="route().current()" />
    <v-main style="background-color: #ececec">
      <flash-messages />
      <slot />
    </v-main>

    <v-footer app small>
      &copy; {{ new Date().getFullYear() }} {{ $page.props.app.name }}
    </v-footer>
  </v-app>
</template>

<script>
import FlashMessages from "@/components/Layout/FlashMessages";
import SideBar from "@/components/Layout/SideBar";
import FooterSec from "@/Components/Layout/FooterSec.vue";

export default {
  components: {
    FlashMessages,
    SideBar,
    FooterSec,
  },
};
</script>
