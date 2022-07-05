<template>
  <v-row>
    <v-img src="../../assets/w2.jpg" height="400">
      <v-overlay absolute>
        <v-layout align-center justify-center column fill-height>
          <h1
            class="white--text"
               v-vue-aos="{
              animationClass: ' animate__slideInDown animate__animated',
            }"
          >
            Join Our Family
            <v-icon size="30" class="mb-2" color="#f3f3f3">mdi-heart</v-icon>
          </h1>
          <h3 class="white--text mt-4 font-weight-thin">
            You can choose your road from here ! search for the job that suits
            you with the best specifications in the shortest time
          </h3>
          <v-hover v-slot="{ hover }">
            <v-btn
              :color="hover ? 'teal lighten-2' : 'teal accent-4'"
              class="mt-7 white--text"
              elevation="4"
              rounded
               :href="route('register')"
              >register now</v-btn
            >
          </v-hover>
        </v-layout>
      </v-overlay>
    </v-img>
  </v-row>
</template>

<script>
export default {}
</script>

<style>
</style>
