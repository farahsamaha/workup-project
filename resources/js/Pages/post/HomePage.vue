<template>
  <v-container>
    <v-row>
      <v-col cols="4">
        <inbox-sec />
      </v-col>
      <v-divider vertical></v-divider>
      <v-col cols="8">
        <div v-for="post in posts.data" :key="post.id">
          <post-card :post="post"></post-card>
        </div>
        <!-- <post-card /> -->
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import PostCard from "@/components/home/PostCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InboxSec from "@/components/home/InboxSec.vue";

export default {
  layout: AuthenticatedLayout,
  components: {
    PostCard,
    InboxSec,
  },
  props: ["posts"],
};
</script>
