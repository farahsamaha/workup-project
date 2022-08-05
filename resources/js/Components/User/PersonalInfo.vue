<template>
  <!-- <v-container> -->
  <v-card class="pa-2 mt-9" elevation="2">
    <v-row align-content="center">
      <v-col cols="8">
        <v-card-title class="text-h4 mt-3 mx-2 font-weight-medium teal--text">
          About</v-card-title
        ></v-col
      >
      <v-col>
        <!-- <v-btn
          class="mt-9 ml-2"
          icon
          color="grey"
          :href="route('user.edit')"
          @click.prevent="$inertia.visit(route('user.edit'))"
        >
          <v-icon>mdi-pencil</v-icon>
        </v-btn> -->
        <v-btn
          class="mt-8 ml-12"
          icon
          color="grey"
          :href="route('createuser')"
          @click.prevent="$inertia.visit(route('createuser'))"
        >
          <v-icon>mdi-pencil</v-icon>
        </v-btn></v-col
      >
    </v-row>

    <v-list two-line>
      <v-list-item>
        <v-list-item-icon class="mt-7">
          <v-icon> mdi-clipboard-text </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.about }}</v-list-item-title>
          <v-list-item-subtitle></v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-divider inset></v-divider>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-calendar-star-outline </v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ user.birth_date }}</v-list-item-title>
          <v-list-item-subtitle>Birthday</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon> mdi-phone </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.mobile }}</v-list-item-title>
          <v-list-item-subtitle>Mobile</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="teal-accent-4"> mdi-email </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.email }}</v-list-item-title>
          <v-list-item-subtitle>Email</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="teal-accent-4"> mdi-map-marker </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title
            >{{ user.location_id }}
            <!-- {{ user.location.name }} -->
          </v-list-item-title>
          <v-list-item-subtitle>City</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-card>
  <!-- </v-container> -->
</template>

<script>
export default {
  // props: { user: Object },
  computed: {
    user() {
      return this.$page.props.user;
    },
  },
};
</script>
