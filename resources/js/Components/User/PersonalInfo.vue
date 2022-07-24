<template>
  <!-- <v-container> -->
  <v-card class="pa-2" outlined tile>
    <v-row class="fill-height">
      <v-card-title class="text-h4 my-5 mx-2 font-weight-bold orange--text">
        About
        <v-btn
          icon
          color="orange"
          :href="route('edituser')"
          @click.prevent="$inertia.visit(route('edituser'))"
        >
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn
          icon
          color="orange"
          :href="route('createuser')"
          @click.prevent="$inertia.visit(route('createuser'))"
        >
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
      </v-card-title>
    </v-row>

    <v-list two-line>
      <v-list-item>
        <v-list-item-icon>
          <v-icon> mdi-clipboard-text </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.About }}</v-list-item-title>
          <v-list-item-subtitle>Headline*</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-list-item>
        <v-list-item-icon>
          <v-icon> </v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ user.Birth_date }}</v-list-item-title>
          <v-list-item-subtitle>Birthday</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="teal-accent-4"> mdi-phone </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.Mobile }}</v-list-item-title>
          <v-list-item-subtitle>Mobile</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="teal-accent-4"> mdi-email </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.Email }}</v-list-item-title>
          <v-list-item-subtitle>Email</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider inset></v-divider>

      <v-list-item>
        <v-list-item-icon>
          <v-icon color="teal-accent-4"> mdi-map-marker </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ user.location_id }}</v-list-item-title>
          <v-list-item-subtitle>City</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-card>
  <!-- </v-container> -->
</template>

<script>
export default {
  props: {
    users: Object,
  },
};
</script>
