<template>
  <div>
    <div v-for="(comment, i) in comments" :key="i">
      <comment-item :comment="comment" />
    </div>
  </div>
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
