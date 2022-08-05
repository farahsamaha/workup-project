<template>
  <v-card class="mx-auto mt-9" max-width="600" elevation="0">
    <!-- <v-img
        class="elevation-6 profile h-8 w-8 rounded"
        :alt="$page.props.auth.user.name"
        :src="$page.props.auth.user.featured_image"
      ></v-img> -->
    <v-row>
      <v-avatar class="ml-5">
        <img
          src="https://png.pngtree.com/png-vector/20191027/ourlarge/pngtree-avatar-vector-icon-white-background-png-image_1884971.jpg"
        />
      </v-avatar>
      <h3 class="ml-3 mt-4">
        {{ $page.props.auth.user.name }}
      </h3>
    </v-row>
    <form @submit.prevent="updateComment">
      <v-row>
        <v-col cols="12">
          <p class="bg-gray-100 mt-2 px-3 py-2">
            <v-text-field
              class="mt-5"
              filled
              v-model="form.content"
              label="edit comment"
            ></v-text-field>
            <v-btn outlined color="teal accent-4" type="submit">
              <v-icon color="teal">mdi-pencil</v-icon>update comment
            </v-btn>
          </p></v-col
        ></v-row
      >
    </form>
  </v-card>
</template>

<script>
export default {
  props: {
    comment: Object,
    user: Object,
  },
  computed: {},
  data() {
    return {
      form: this.$inertia.form({
        content: this.comment.content,
      }),
    };
  },
  methods: {
    updateComment() {
      this.$inertia.put(`/comments/${this.comment.id}`, this.form);
    },
  },
};
</script>

