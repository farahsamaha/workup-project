  <template>
  <v-row>
    <v-col>
      <v-card class="mx-auto my-9" max-width="500">
        <v-card-title>
          <v-list-item-avatar color="grey darken-3">
            <v-img
              class="elevation-6 profile h-8 w-8 rounded"
              :alt="$page.props.auth.user.name"
              :src="$page.props.auth.user.featured_image"
            ></v-img>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>
              {{ $page.props.auth.user.name }}</v-list-item-title
            >
          </v-list-item-content>
        </v-card-title>
        <v-container>
          <form @submit.prevent="updatePost">
            <v-img
              class="white--text align-end"
              height="250px"
              :src="`${post.image}`"
              v-if="post.image"
            >
            </v-img>
            <v-card-text>
              <v-textarea
                v-model="form.content"
                placeholder="type what you think about !"
                clearable
                clear-icon="mdi-close-circle"
              ></v-textarea>
            </v-card-text>
            <v-card-actions>
              <v-row align="center" justify="end">
                <v-container>
                  <v-btn
                    dark
                    color="teal"
                    class="mx-4 my-7"
                    type="submit"
                    outlined
                  >
                    <v-icon>mdi-pencil</v-icon>update post
                  </v-btn>

                  <v-btn dark small color="teal" height="35" width="28">
                    <v-file-input
                      small
                      class="ml-3 mb-4"
                      dark
                      prepend-icon="mdi-camera"
                      hide-input
                      :rules="rules"
                      v-model="form.image"
                    ></v-file-input>
                  </v-btn>
                </v-container>
              </v-row>
            </v-card-actions>
          </form>
        </v-container>
      </v-card> </v-col
  ></v-row>
</template>

<script>
// import CommentItem from "@/components/home/CommentItem.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
  layout: AuthenticatedLayout,

  // components: {
  //   CommentItem,
  // },
  props: {
    post: Object,
    user: Object,
  },
  computed: {
    can() {
      return this.$page.props.can;
    },
  },
  data() {
    return {
      form: this.$inertia.form({
        content: this.post.content,
        user_id: "",
      }),
    };
  },
  methods: {
    updatePost() {
      this.$inertia.put(`/posts/${this.post.id}`, this.form);
    },
  },
};
</script>
