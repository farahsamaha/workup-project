<template>
  <v-container id="reviews">
    <v-row>
      <v-col cols="12">
        <div class="text-h2 text-center mt-7 teal--text">Reviews</div>
      </v-col>
      <v-col v-for="(review, i) in reviews" :key="i" cols="3">
        <v-card
          class="mx-auto my-11"
          elevation="5"
          max-width="400"
          max-height="300"
        >
          <v-card-actions>
            <v-list-item class="grow">
              <v-list-item-avatar size="60">
                <v-img class="elevation-5" :src="review.src"></v-img>
              </v-list-item-avatar>

              <v-list-item-content>
                <v-list-item-title class="text-h6">{{
                  review.username
                }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-card-actions>
          <v-rating
            class="ml-5"
            :value="review.rate"
            color="teal accent -4"
            dense
            half-increments
            readonly
            size="14"
          ></v-rating>
          <v-card-text class="text-h6 font-weight-bold">
            {{ review.comment }}
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    length: 5,
    selection: 1,
    reviews: [
      {
        src: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVvcGxlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
        username: 'Reem sh',
        comment:
          '  Lorem ipsum dolor, amet consectetur adipisicing elit. Est, hic.',
        rate: '4.5'
      },
      {
        src: 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60',
        username: 'Majd abdallah',
        comment:
          '  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est, hic.',
        rate: '4'
      },
      {
        src: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
        username: 'Sami ',
        comment:
          '  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est, hic.',
        rate: '4.5'
      },
      {
        src: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
        username: 'Nour ahmad',
        comment:
          '  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est, hic.',
        rate: '3'
      }
    ]
  }),

  methods: {
    reserve () {
      this.loading = true

      setTimeout(() => (this.loading = false), 2000)
    }
  }
}
</script>

<style>
</style>
