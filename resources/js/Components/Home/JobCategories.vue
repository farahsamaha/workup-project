 <template>
  <v-container id="categories" class="my-12" height="500">
    <v-row
    >
      <v-col cols="12">
        <div class="text-h2 text-center my-5 teal--text">Job Categories</div>
      </v-col>
      <v-col v-for="(Category, i) in categories" :key="i" cols="3">
        <v-hover v-slot="{ hover }">
          <v-card
            class="mx-auto"
            max-width="344"
            max-height="360"
            :class="{ scale: hover }"
          >
            <v-img :src="Category.src" height="200px"></v-img>
            <v-card-title>
              {{ Category.title }}
            </v-card-title>
            <v-card-subtitle>
              {{ Category.subtitle }}
            </v-card-subtitle>
            <v-btn
              class="teal accent-4 white--text ma-3"
              elevation="2"
              rounded
              x-small
              tile
              >{{ Category.count }}</v-btn
            >
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
        src: require('../../assets/it.jpg'),
        title: 'Information Technology',
        subtitle:
          'web developer / data analysist / graphic designer / software engineering',
        count: '20'
      },

      {
        src: require('../../assets/eco.jpg'),
        title: 'Economy',
        subtitle:
          'accountant / HR manager/ Banking / sales manager / supply chain ',
        count: '32'
      },

      {
        src: require('../../assets/ad.jpg'),
        title: 'Adminstiration Mangement',
        subtitle:
          'data entry / publishing / archiving / translation / customer services  / Logistic ',
        count: '19'
      },
      {
        src: require('../../assets/other.jpg'),
        title: 'Others',
        subtitle: 'Secertaria/ Reseptionest  / writing editorial / negotietor',
        count: '11'
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
