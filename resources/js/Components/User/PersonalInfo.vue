<template>
    <v-card class="pa-2" outlined tile>
        <v-list-item-content class="ml-5">
            <v-list-item-title class="title">
                <h1>Nour Aldeen Sh</h1>
                <br />
            </v-list-item-title>
            <h2>About me</h2>
        </v-list-item-content>
        <v-row class="fill-height">
            <v-card-title>
                <v-btn dark icon color="teal-accent-4" class="mr-4">
                    <v-icon>mdi-pencil</v-icon>
                </v-btn>

                <v-spacer></v-spacer>

                <v-btn dark icon color="teal-accent-4">
                    <v-icon>mdi-dots-vertical</v-icon>
                </v-btn>
            </v-card-title>
        </v-row>
        <v-spacer></v-spacer>

        <v-list two-line>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"></v-icon>
                </v-list-item-icon>
                <v-list-item-action></v-list-item-action>

                <v-list-item-content>
                    <v-list-item-title>4/4/1998</v-list-item-title>
                    <v-list-item-subtitle>Birthday</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"> mdi-phone </v-icon>
                </v-list-item-icon>
                <v-list-item-action></v-list-item-action>

                <v-list-item-content>
                    <v-list-item-title>(963) 944877638</v-list-item-title>
                    <v-list-item-subtitle>Mobile</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-icon>
                    <v-icon color="teal-accent-4">mdi-message-text</v-icon>
                </v-list-item-icon>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"> mdi-email </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title
                        >nouralddin@example.com</v-list-item-title
                    >
                    <v-list-item-subtitle>Personal</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-list-item>
                <v-list-item-action></v-list-item-action>

                <v-list-item-content>
                    <v-list-item-title
                        >nour_alddin@example.com</v-list-item-title
                    >
                    <v-list-item-subtitle>Work</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider inset></v-divider>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon color="teal-accent-4"> mdi-map-marker </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Mazzeh</v-list-item-title>
                    <v-list-item-subtitle>Damascus, Syria</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-card>
</template>
