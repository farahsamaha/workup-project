<template>
  <v-card class="mx-auto mt-9" max-width="600" elevation="0">
    <div v-for="comment in comments.data" :key="comment.id">
      <comment-item :comment="comment" />
    </div>
    <v-container>
      <v-row>
        <v-col cols="2">
          <v-avatar class="ml-5">
            <img src="https://i.pravatar.cc/64" />
            <!-- <img
            class="elevation-1 profile rounded"
            :src="comment.user.featured_image"
            :alt="comment.user.name"
          /> -->
          </v-avatar></v-col
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
  layout: AuthenticatedLayout,
  props: ["comments", "post"],
  components: {
    CommentItem,
  },
  computed: {
    can() {
      return this.$page.props.can;
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
    // store() {
    //   this.form.post(this.route("comment.store", this.post), {
    //     preserveScroll: true,
    //     onSuccess: () => {
    //       Toast.fire({
    //         icon: "success",
    //         title: "Your comment has successfully been published!",
    //       });
    //       this.form.content = null;
    //     },
    //   });
    // },
  },
};
</script>
