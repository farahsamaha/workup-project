<template>
  <v-container>
    <v-col>
      <post-card />
    </v-col>
  </v-container>
</template>

<script>
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
import PostCard from "@/components/home/PostCard.vue";
export default {
  layout: AuthenticatedLayout,
  components: { PostCard },
};
</script>

<style>
</style>
