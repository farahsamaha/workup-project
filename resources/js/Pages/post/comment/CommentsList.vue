<template>
  <v-card class="mx-auto mt-9" max-width="600" elevation="0">
    <post-card />
    <div v-for="comment in comments.data" :key="comment.id">
      <comment-item :comment="comment" />
    </div>
    <v-container>
      <v-row>
        <v-col cols="2">
          <v-avatar class="ml-5">
            <img
              src="https://png.pngtree.com/png-vector/20191027/ourlarge/pngtree-avatar-vector-icon-white-background-png-image_1884971.jpg"
            />
            <!-- <img
              class="elevation-1 profile rounded"
              :src="user.featured_image"
              :alt="comment.user.name"
            />  -->
          </v-avatar> </v-col
        ><v-col cols="10">
          <form @submit.prevent="store">
            <v-text-field
              class="ml-1"
              v-model="form.content"
              :error-messages="form.errors.content"
              hide-details
              flat
              label="Leave a comment..."
              solo
            >
              <template v-slot:append
                ><v-btn
                  class="mr-5"
                  depressed
                  type="submit"
                  dark
                  color="orange"
                >
                  Post
                </v-btn></template
              >
            </v-text-field>
          </form></v-col
        >
      </v-row></v-container
    >
  </v-card>
</template>

<script>
import CommentItem from "@/components/home/CommentItem.vue";
import PostCard from "@/components/home/PostCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
  layout: AuthenticatedLayout,
  props: ["comments", "post"],
  components: {
    CommentItem,
    PostCard,
  },

  computed: {
    can() {
      return this.$page.props.can;
    },

    user() {
      return this.$page.props.user;
    },
  },
  data() {
    return {
      form: this.$inertia.form({
        content: "",
      }),
    };
  },
  methods: {
    store() {
      this.form.post(`/comments/${this.post.id}`);
    },
  },
};
</script>
