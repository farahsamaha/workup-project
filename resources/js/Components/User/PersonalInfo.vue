<template>
<v-container>
    <v-card class="pa-2" outlined tile>
        <v-row class="fill-height">
            <v-card-title
          class="text-h4 my-5 mx-2 font-weight-bold orange--text"
          > About
          <v-btn icon color="orange">
                    <v-icon>mdi-pencil</v-icon>
                </v-btn>
                <v-btn icon  color="orange" :href="route('createuser')">
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
                    <v-list-item-title>Frontend developer</v-list-item-title>
                    <v-list-item-subtitle>Headline*</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon> </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>4/4/1998</v-list-item-title>
                    <v-list-item-subtitle>Birthday</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-divider inset></v-divider>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"> mdi-phone </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>(963) 944877638</v-list-item-title>
                    <v-list-item-subtitle>Mobile</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"> mdi-email </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>nouralddin@example.com</v-list-item-title>
                    <v-list-item-subtitle>Email</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"> mdi-map-marker </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Damascus, Syria</v-list-item-title>
                    <v-list-item-subtitle>Address</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-card>
    </v-container>
</template>

