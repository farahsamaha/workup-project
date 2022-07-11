 <template>
  <v-container id="categories" class="my-12" height="500">
    <v-row
    >
      <v-col cols="12">
        <div class="text-h2 text-center my-5 teal--text">Popular Categories</div>
      </v-col>
      <v-col v-for="(Category, i) in categories" :key="i" cols="4">
        <v-hover v-slot="{ hover }">
          <v-card
            class="mx-auto"
            width="344"
            height="300"
            :class="{ scale: hover }"
          >
            <v-img :src="Category.src" height="200px"></v-img>
            <v-card-title>
              {{ Category.title }}
            </v-card-title>
            <v-card-subtitle>
              {{ Category.subtitle }}
            </v-card-subtitle>
          </v-card>
        </v-hover>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    categories: [
      {
        src: '/assets/it.jpg',
        title: 'Information Technology',
        subtitle:
          'web developer / data analysist / graphic designer / software engineering',

      },

      {
        src: '/assets/eco.jpg',
        title: 'Economy',
        subtitle:
          'accountant / HR manager/ Banking / sales manager / supply chain ',

      },

      {
        src: '/assets/ad.jpg',
        title: 'Adminstiration Mangement',
        subtitle:
          'data entry / publishing / archiving / translation / customer services  / Logistic ',

      }
    ]
  })
}
</script>

<style>
.scale .v-image__image {
  transform: scale(1.1);
  transition: transform 1s;
}
</style>
