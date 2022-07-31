<template>
  <v-row>
    <v-col>
      <v-card class="mx-auto my-9" max-width="400" elevation="5">
        <div v-for="(comment, i) in comments" :key="i">
          <comment-item :comment="comment" />
        </div> </v-card></v-col
  ></v-row>
</template>

<script>
import CommentItem from "@/components/home/CommentItem.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
  layout: AuthenticatedLayout,
  props: ["comments"],
  components: {
    CommentItem,
  },
};
</script>
