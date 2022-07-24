<template>
  <v-container>
    <v-row>
      <v-col cols="4">
        <inbox-sec />
      </v-col>
      <v-divider vertical></v-divider>
      <v-col cols="8">
        <post-card />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import PostCard from "@/components/home/PostCard.vue";
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
import InboxSec from "@/components/home/InboxSec.vue";

export default {
  layout: AuthenticatedLayout,
  components: {
    PostCard,
    InboxSec,
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap");
.text-h1 {
  font-family: "macondo";
}
</style>
