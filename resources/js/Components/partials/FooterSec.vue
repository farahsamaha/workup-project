<template>
  <v-footer dark padless>
    <v-card
      flat
      tile
      class="teal accent-4 white--text text-center"
      width="100%"
      height="112"
    >
      <v-card-text>
        <v-btn v-for="icon in icons" :key="icon" class="mx-4 white--text" icon>
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn><br>
           Get connected with us on social networks!<br>
      {{ new Date().getFullYear() }} — <strong>Work Up</strong>
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
    icons: ['mdi-facebook', 'mdi-twitter', 'mdi-linkedin', 'mdi-instagram']
  })
}
</script>

<style>
</style>
