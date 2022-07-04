  <template>
  <v-row>
  <v-col>
    <v-card class="mx-auto" max-width="600">
      <v-card-title>
        <v-list-item-avatar color="grey darken-3">
          <v-img
            class="elevation-6"
            src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
          ></v-img>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>user name</v-list-item-title>
          <v-list-item-subtitle color="grey darken-2"
            >frontend developer</v-list-item-subtitle
          >
        </v-list-item-content>
      </v-card-title>
      <v-container>
        <v-img
          class="white--text align-end"
          height="250px"
          src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
        >
        </v-img>
        <v-card-text class="text-h5 font-weight-bold">
          "Turns out semicolon-less style is easier and safer in TS because most
          gotcha edge cases are type invalid as well."
        </v-card-text>
        <v-card-actions>
          <v-row align="center" justify="end">
            <v-container>
              <v-icon class="mr-1"> mdi-heart </v-icon>
              <span class="subheading mr-2">likes</span>
              <span class="mr-1">·</span>
              <v-icon class="mr-1"> mdi-share-variant </v-icon>
              <span class="subheading">share</span>
              <span class="mr-1">· </span>
              <v-icon class="mr-1"> mdi-comment</v-icon>
              <span class="subheading">comments</span>
              <v-text-field
                class="mt-5"
                filled
                prepend-icon="mdi-comment-text"
                v-model="newComment.content"
                :rules="commentRules"
                label="Comment"
                :counter="200"
              ></v-text-field>
              <v-btn
                type="submit"
                outlined
                class=" ml-5 mt-1"
                color="teal accent-4"
                :disabled="!validComment"
                >post comment</v-btn
              >
            </v-container>
          </v-row>
        </v-card-actions>
      </v-container>
    </v-card>
  </v-col></v-row>
</template>

<script>
export default {
  data: () => ({
    newComment: {
      name: '',
      email: '',
      content: ''
    },
    validComment: false,
    nameRules: [
      (v) => !!v || 'Name is required',
      (v) => v.length <= 25 || 'Name must be less than 25 characters'
    ],
    commentRules: [
    //   (v) => !!v || 'Comment is required',
      (v) => v.length <= 200 || 'Comment must be less than 200 characters'
    ]
  })
}
</script>
