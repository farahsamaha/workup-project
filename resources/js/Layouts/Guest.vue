<template>
  <v-app>
    <v-app-bar
      app
      flat
      color="background"
      height="100"
      hide-on-scroll
    >
      <v-container>
        <v-row>
          <v-col cols="12">
            <div class="d-flex align-center">
              <Link
                class="d-flex"
                :href="route('welcome')"
              >
              </Link>
              <v-spacer />
              <!-- Place this tag where you want the button to render. -->
              <v-link
                text
                rounded
                class="mr-4"
                :href="route('register')"
              >Register</v-link>
              <v-link
                text
                rounded
                :href="route('login')"
              >Login</v-link>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-app-bar>

    <v-main class="mb-12">
      <slot />
    </v-main>

    <footer-sec/>
  </v-app>
</template>

<script>
import FooterSec from '@/Components/FooterSec.vue'

export default {
  components: {
    FooterSec
  }
}
</script>
