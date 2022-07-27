<template>
  <div class="flex border-t border-gray-400 mt-5 py-5 space-x-5">
    <div class="flex-shrink-0" :href="route('UserProfile', comment.user.name)">
      <img
        class="h-8 w-8 rounded-full object-cover"
        :src="comment.user.featured_image"
        :alt="comment.user.name"
      />
    </div>

    <div class="flex-1">
      <div>
        <h4 class="underline" :href="route('UserProfile', comment.user.name)">
          {{ comment.user.name }}
        </h4>

        <v-btn dark icon :href="route('EditComment', comment.user.name)">
          <v-icon color="teal">mdi-pencil</v-icon>
        </v-btn>
        <v-btn dark icon @submit.prevent="deleteComment">
          <v-icon color="teal">mdiDelete</v-icon>
        </v-btn>

        <p class="bg-gray-100 mt-2 px-3 py-2">
          {{ comment.content }}
        </p>
        <div>
          <span class="text-sm italic">{{ comment.published_at }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["comment"],
  methods: {
    deleteComment() {
      this.$inertia.delete(`/comments/${this.comment.id}`);
    },
  },
};
</script>
