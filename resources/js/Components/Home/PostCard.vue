  <template>
  <v-row>
    <v-col>
      <v-card class="mx-auto" max-width="600">
        <v-card-title>
          <v-list-item-avatar
            color="grey darken-3"
            :href="route('UserProfile', post.user.name)"
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
                <v-list-item @submit.prevent="deletePost">
                  <v-list-item-title
                    ><v-icon>mdiDelete</v-icon> Delete post</v-list-item-title
                  >
                </v-list-item>
                <v-list-item :href="route('EditPost', post.user.name)">
                  <v-list-item-title
                    ><v-icon>mdiPencil</v-icon>Edit post</v-list-item-title
                  >
                </v-list-item>
              </form>
            </v-list>
          </v-menu>
        </v-card-title>
        <v-container>
          <!-- <v-img
          class="white--text align-end"
          height="250px"
          src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
        >
        </v-img> -->
          <v-card-text>
            {{ post.content }}
          </v-card-text>
          <div>
            <span class="text-sm italic">{{ post.published_at }}</span>
          </div>
          <v-card-actions>
            <v-row align="center" justify="end">
              <v-container>
                <v-icon
                  @click="like"
                  v-if="liked"
                  color="red"
                  class="mr-1"
                  small
                >
                  mdi-cards-heart
                </v-icon>
                <v-icon v-else class="mr-1" small
                  >mdi-cards-heart-outline</v-icon
                >

                <span
                  class="subheading mr-2"
                  :href="route('likeslist', post.likes)"
                  >Likes</span
                >

                <span class="mr-1">· </span>
                <v-icon class="mr-1" small> mdi-comment</v-icon>
                <span
                  class="subheading"
                  :href="route('commentslist', post.comments)"
                  >Comments</span
                >

                <!-- create comment -->
                <form @submit.prevent="store">
                  <v-text-field
                    class="mt-5"
                    filled
                    prepend-icon="mdi-comment-text"
                    v-model="form.content"
                    :error-messages="form.errors.content"
                    label="Comment"
                  ></v-text-field>
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
  props: ["post"],
  data: () => ({
    form: this.$inertia.form({
      content: "",
      user_id: "",
      published_at: "",
    }),
    likeForm: this.$inertia.form({
      userPost: this.post,
    }),
  }),
  methods: {
    store() {
      this.form.post("/comments");
    },
    Like() {
      this.likeForm.post(this.route("post.likepost", this.post), {
        preserveScroll: true,
        onSuccess: () => {},
      });
    },
    Unlike() {
      this.unlikeForm.delete(this.route("post.unlikepost", this.post), {
        preserveScroll: true,
        onSuccess: () => {},
      });
    },
    deletePost() {
      this.$inertia.delete(`/posts/${this.post.id}`);
    },
  },
};
</script>
