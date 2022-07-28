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

        <form v-if="can.updateComment">
          <p class="bg-gray-100 mt-2 px-3 py-2">
            <v-text-field
              class="mt-5"
              filled
              prepend-icon="mdi-comment-text"
              v-model="form.content"
              :error-messages="form.errors.content"
              label="Comment"
            ></v-text-field>
            <v-btn dark icon @submit.prevent="updateComment">
              <v-icon color="teal">mdi-pencil</v-icon>
            </v-btn>
          </p>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    comment: Object,
    can: Object,
  },
  data: () => ({
    form: this.$inertia.form({
      content: this.commment.content,
    }),
  }),
  methods: {
    updateComment() {
      this.$inertia.put(`/comments/${this.comment.id}`, this.form);
    },
  },
};
</script>

