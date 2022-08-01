<template>
  <v-card class="elevation-0">
    <v-row align-content="center">
      <v-col>
        <v-card-title class="mr-3">
          <v-avatar size="40" dark>
            <img src="https://i.pravatar.cc/64" />
            <!-- <img
              class="elevation-1 profile rounded"
              :src="comment.user.featured_image"
              :alt="comment.user.name"
            /> -->
          </v-avatar>

          <h5
            class="ml-5"
            :href="route('userprofile', comment.user.name)"
            @click.prevent="$inertia.visit(route('userprofile'))"
          >
            {{ comment.user.name }}
          </h5>
        </v-card-title>

        <p class="mx-15">
          {{ comment.content }}
        </p>
        <v-divider class="ml-3" />
      </v-col>
      <v-col cols="3">
        <v-btn
          class="mt-6 ml-4"
          dark
          x-small
          icon
          :href="`/comments/${this.comment.id}/edit`"
        >
          <v-icon color="grey">mdi-pencil</v-icon>
        </v-btn>
        <v-btn
          class="mt-6 ml-6"
          dark
          x-small
          icon
          @click.prevent="deleteComment()"
        >
          <v-icon color="grey">mdi-delete</v-icon>
        </v-btn>
      </v-col>
    </v-row>
  </v-card>
</template>

<script>
export default {
  props: {
    comment: Object,
  },

  methods: {
    deleteComment() {
      if (confirm("Are you sure you want to delete this post?")) {
        this.$inertia.delete(`/comments/${this.comment.id}`);
      }
    },
  },
};
</script>
