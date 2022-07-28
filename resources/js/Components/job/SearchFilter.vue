<template>
  <v-row>
    <v-col cols="12">
      <v-layout align-center column fill-height class="mt-9">
        <h1 class="teal--text">Let Us Find Your Perfect Job !</h1>
        <form @submit.prevent="search">
          <v-row align="center" class="my-6" justify="center">
            <v-btn text fab class="ml-9" type="submit">
              <v-icon large color="teal accent-4">mdi-magnify</v-icon></v-btn
            >
            <v-col cols="3" sm="3">
              <v-text-field
                label="title"
                item-text="name"
                item-value="id"
                v-model="form.title"
              />
            </v-col>
            <v-col cols="2" sm="2">
              <v-select
                :items="categories"
                item-text="name"
                item-value="id"
                v-model="form.category_id"
                label="Category"
                prepend-icon=" mdi-view-grid-outline"
              ></v-select>
            </v-col>

            <v-col cols="3" sm="2">
              <v-select
                :items="locations"
                item-text="name"
                item-value="id"
                v-model="form.location_id"
                prepend-icon="mdi-map-marker"
                label="Location"
              ></v-select>
            </v-col>

            <v-col cols="2" sm="2">
              <v-select
                :items="types"
                item-text="name"
                item-value="id"
                v-model="form.type_id"
                label="Type"
                prepend-icon="mdi-briefcase-outline"
              ></v-select
            ></v-col>
          </v-row></form
      ></v-layout>
    </v-col>
  </v-row>
</template>

<script>
export default {
  props: {
    filters: Object,
    jobs: Object,
    categories: Array,
    locations: Array,
    types: Array,
  },
  data() {
    return {
      // filters: "",
      //   form: {
      //     search: this.filters.search,
      //     types: this.filters.types,
      //     location: this.filters.locations,
      //     category: this.filters.categories,
      //   },
      form: this.$inertia.form({
        title: "",
        category_id: "",
        location_id: "",
        type_id: "",
      }),
    };
  },

  //   watch: {
  //   form: {
  //     deep: true,
  //     handler: throttle(function () {
  //       this.form.get('/jobs', pickBy(this.form), { preserveState: true })
  //     }, 150),
  //   },
  // },

  methods: {
    search() {
      this.form.get(route("jobs", { filter: this.filter }));
      // this.form.replace(this.$route("jobs", { filter: this.filter }));
    },
  },
};
</script>

<style>
</style>
