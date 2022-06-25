<template>
  <v-app>
 <AppBar/>
      <slot />
  </v-app>
</template>

<script>
import AppBar from '../Components/Layout/AppBar.vue'
export default {
  components: { AppBar },

}
</script>

<style>

</style>
