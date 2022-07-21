<template>
  <v-app>
    <v-app-bar app elevation="0" height="60px" fixed>
      <v-app-bar-title>
        <v-btn
          elevation="0"
          text
          height="40"
          width="150"
          :href="route('homepage')"
          @click.prevent="$inertia.visit(route('homepage'))"
        >
          <v-img
            class="mx-2 ml-5"
            src="/assets/logo2.png"
            max-height="100"
            max-width="130"
            contain
          ></v-img
        ></v-btn>
      </v-app-bar-title>
      <v-spacer></v-spacer>
      <div>
        <v-btn
          text
          class="mx-4"
          color="teal"
          :href="route('jobs')"
          @click.prevent="$inertia.visit(route('jobs'))"
        >
          <v-icon>mdi-home</v-icon>
          <span>Home</span>
        </v-btn>

        <v-btn
          text
          class="mx-4"
          color="teal"
          :href="route('createjob')"
          @click.prevent="$inertia.visit(route('createjob'))"
        >
          <v-icon>mdi-plus-box</v-icon>
          <span>Add Job</span>
        </v-btn>

        <v-btn
          text
          class="mx-4"
          color="teal"
          :href="route('managejob')"
          @click.prevent="$inertia.visit(route('managejob'))"
        >
          <v-icon>mdi-wallet-travel</v-icon>
          <span>Manage jobs</span>
        </v-btn>
      </div>
      <v-btn
        icon
        @click.prevent="$vuetify.theme.dark = !$vuetify.theme.dark"
        class="teal--text"
      >
        <v-icon v-if="!$vuetify.theme.dark"> mdi-weather-night </v-icon>
        <v-icon v-else> mdi-white-balance-sunny </v-icon>
      </v-btn>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-navigation-drawer app v-model="drawer" absolute temporary right>
        <v-list nav dense>
          <v-list-item
            class="px-0"
            style="height: 60px"
            :href="route('userprofile')"
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
          <v-divider class="ml-3 mr-3"></v-divider>
          <!-- <v-list-item-group v-model="group" active-class="text--accent-4">
            <v-list-item v-for="item in items" :key="item.title" link>
              <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group> -->
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <v-btn block class="teal accent-4 white--text" @click="logout">
              <v-icon>mdi-lock</v-icon>
              Logout
            </v-btn>
          </div>
        </template>
        <!-- <v-list nav dense>
            <v-list dense nav>
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
          </v-list-item-group>
        </v-list> -->
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
import FooterSec from "@/components/partials/FooterSec.vue";

export default {
  //   data() {
  //     return {

  //       items: [
  //         { title: "Dashboard", icon: "mdi-view-dashboard" },
  //         { title: "Account", icon: "mdi-account-box" },
  //         { title: "Admin", icon: "mdi-gavel" },
  //       ],
  //     };
  //   },
  components: {
    FlashMessages,
    SideBar,
    FooterSec,
  },
  computed: {
    title() {
      return this.$page.props.title;
    },
    auth() {
      return this.$page.props.auth;
    },
  },
  watch: {
    group() {
      this.drawer = false;
    },
  },
  data() {
    return {
      drawer: false,
      group: null,
      mini: true,
      menu: [
        {
          text: "Dashboard",
        },
      ],
    };
  },
  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
