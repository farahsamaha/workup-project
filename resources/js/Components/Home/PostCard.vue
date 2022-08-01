  <template>
  <v-row>
    <v-col>
      <v-card class="mx-auto" max-width="600">
        <v-card-title>
          <v-list-item-avatar
            color="grey darken-3"
            :href="route('userprofile', post.user.name)"
          >
            <v-img
              :src="post.user.featured_image"
              :alt="post.user.name"
              class="elevation-1 profile h-8 w-8 rounded"
            ></v-img>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>
              {{ post.user.name }}
            </v-list-item-title>
            <v-list-item-subtitle color="grey darken-2">
              {{ post.user.about }}
            </v-list-item-subtitle>
          </v-list-item-content>
          <v-menu bottom left>
            <template v-slot:activator="{ on, attrs }">
              <v-btn dark icon v-bind="attrs" v-on="on">
                <v-icon color="teal">mdi-dots-vertical</v-icon>
              </v-btn>
            </template>

            <v-list>
              <form>
                <v-list-item @click.prevent="deletePost()">
                  <v-list-item-title
                    ><v-icon>mdi-delete</v-icon> Delete post</v-list-item-title
                  >
                </v-list-item>
                <v-list-item :href="`/posts/${this.post.id}/edit`">
                  <v-list-item-title
                    ><v-icon>mdi-pencil</v-icon>Edit post</v-list-item-title
                  >
                </v-list-item>
              </form>
            </v-list>
          </v-menu>
        </v-card-title>
        <v-container>
          <v-img
            height="250px"
            :src="`/storage/${post.image}`"
            v-if="post.image"
          >
          </v-img>
          <v-card-text>
            {{ post.content }}
          </v-card-text>
          <div>
            <span class="text-sm teal--text italic">{{ post.created_at }}</span>
          </div>
          <v-card-actions>
            <v-row align="center" justify="end">
              <v-container>
                <v-icon
                  @click="unlike"
                  v-if="post.liked"
                  color="red"
                  class="mr-1"
                  small
                >
                  mdi-cards-heart
                </v-icon>
                <v-icon v-else class="mr-1" small @click="like"
                  >mdi-cards-heart-outline</v-icon
                >
                <!-- how to display likescount?? -->
                <span class="subheading mr-2">Likes</span>

                <span class="mr-1">· </span>
                <v-icon class="mr-1" small> mdi-comment</v-icon>
                <span
                  class="subheading"
                  :href="`/comments/${this.post.id}/index`"
                  @click.prevent="$inertia.visit(route('commentslist'))"
                  >Comments</span
                >

                <!-- create comment -->
                <form @submit.prevent="store">
                  <v-row>
                    <v-btn fab text class="mt-7" type="submit"
                      ><v-icon>mdi-comment-text</v-icon></v-btn
                    >
                    <v-text-field
                      class="mt-7 mr-3"
                      filled
                      v-model="form.content"
                      :error-messages="form.errors.content"
                      label="Comment"
                    ></v-text-field>
                  </v-row>
                </form>
                <!-- <comment-item /> -->
              </v-container>
            </v-row>
          </v-card-actions>
        </v-container>
      </v-card>
    </v-col></v-row
  >
</template>

<script>
import CommentItem from "@/components/home/CommentItem.vue";

export default {
  components: {
    CommentItem,
  },
  props: {
    post: Object,
    user: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        content: "",
      }),
      likeForm: this.$inertia.form({
        userPost: this.post,
      }),
      unlikeForm: this.$inertia.form({
        userPost: this.post,
      }),
      likescount: this.$inertia.form({
        userPost: this.post,
      }),
    };
  },
  computed: {
    can() {
      return this.$page.props.can;
    },
  },
  methods: {
    store() {
      this.form.post(`/comments/${this.post.id}`);
    },
    like() {
      this.likeForm.post(this.route("likepost", this.post), {
        preserveScroll: true,
        onSuccess: () => {},
      });
    },
    unlike() {
      this.unlikeForm.post(this.route("unlikepost", this.post), {
        preserveScroll: true,
        onSuccess: () => {},
      });
    },
    likescount() {
      this.likescount.post(this.route("getlikescount", this.post), {
        preserveScroll: true,
        onSuccess: () => {},
      });
    },

    deletePost() {
      if (confirm("Are you sure you want to delete this post?")) {
        this.$inertia.delete(`/posts/${this.post.id}`);
      }
    },
  },
};
</script>
