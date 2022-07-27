  <template>
  <v-row>
    <v-col>
      <v-card class="mx-auto my-9" max-width="500">
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
        </v-card-title>
        <v-container>
          <form>
            <v-img
              class="white--text align-end"
              height="250px"
              v-model="form.content"
              :src="post.image"
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
                    color="teal accent-4"
                    class="mx-4 my-7"
                    type="submit"
                    @submit.prevent="updatePost"
                  >
                    <v-icon>mdi-pencil</v-icon>update
                  </v-btn>
                </v-container>
              </v-row>
            </v-card-actions>
          </form>
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
  },
  data: () => ({
    form: this.$inertia.form({
      content: this.post.content,
      image: this.post.image,
    }),
  }),
  methods: {
    updatePost() {
      this.$inertia.put(`/posts/${this.post.id}`, this.form);
    },
  },
};
</script>
