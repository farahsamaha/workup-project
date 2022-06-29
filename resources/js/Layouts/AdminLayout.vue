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
            <v-app-bar-nav-icon
        v-if="$vuetify.breakpoint.mobile"
        @click="drawer = !drawer"
      />    <v-navigation-drawer
      app
      dark
      color="drawer"
      v-model="drawer"
      width="300"
      :mini-variant="mini && !$vuetify.breakpoint.mobile"
      :expand-on-hover="mini && !$vuetify.breakpoint.mobile"
    >
      <v-list
        nav
        dense
      >
        <v-list-group>
          <template #activator>
            <v-list-item
              class="px-0"
              style="height: 60px;"
            >
              <v-list-item-avatar size="24">
                <v-img :src="auth.user.avatar" />
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>
                  {{ auth.user.name }}
                </v-list-item-title>
                <v-list-item-subtitle>
                  {{ auth.user.email }}
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </template>
          <Link
            as="v-list-item"
            :href="route('logout')"
            method="post"
          >
          <v-list-item-icon>
            <v-icon>mdi-lock</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item-content>
          </Link>
        </v-list-group>
      </v-list>

      <v-divider />

      <v-list
        dense
        nav
      >
        <Link
          as="v-list-item"
          v-for="(item, key) in menu"
          :key="key"
          link
          :input-value="item.active"
        >
        <v-list-item-icon>
          <v-icon v-html="item.icon" />
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title v-text="item.text" />
        </v-list-item-content>
        </Link>
      </v-list>
    </v-navigation-drawer>
    </v-app-bar>

    <v-main class="mb-10">
  <flash-messages />
      <slot />
    </v-main>
    <footer-sec />
  </v-app>
</template>

<script>
import FlashMessages from "@/components/partials/FlashMessages";
import SideBar from "@/components/partials/SideBar";
import FooterSec from "@/Components/partials/FooterSec.vue"

export default {
  components: {
    FlashMessages,
    SideBar,
    FooterSec
  },
  computed: {
    title () {
      return this.$page.props.title
    },
    auth () {
      return this.$page.props.auth
    }
  },
  data () {
    return {
      drawer: true,
      mini: true,
      menu: [
        {
          icon: mdiViewDashboardOutline,
          text: 'Dashboard'
        }
      ]
    }
  }
}
</script>
