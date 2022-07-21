<template>
    <v-card class="pa-2" outlined tile>
        <v-list>
            <v-list-group
                v-for="item in items"
                :key="item.title"
                v-model="item.active"
                :prepend-icon="item.action"
                color="teal-accent-4"
                no-action
            >
                <template v-slot:activator>
                    <v-list-item-content>
                        <v-list-item-title
                            v-text="item.title"
                        ></v-list-item-title>
                    </v-list-item-content>
                </template>

                <v-list-item v-for="child in item.items" :key="child.title">
                    <v-list-item-content>
                        <v-list-item-title
                            v-text="child.title"
                        ></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-group>
        </v-list>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        // items: [
        //     {
        //         action: "mdi-ticket",
        //         active: true,
        //         items: [
        //             { title: "Communication" },
        //             { title: "Research" },
        //             { title: "English" },
        //             { title: "Arabic" },
        //         ],
        //         title: "Skills",
        //     },
        //     {
        //         action: "mdi-school",
        //         items: [{ title: "Software Engineering" }],
        //         title: "Education",
        //     },
        //     {
        //         action: "mdi-briefcase",
        //         items: [{ title: "3 Years of teaching" }],
        //         title: "Experience",
        //     },
        //     {
        //         action: "mdi-bottle-tonic-plus",
        //         items: [{ title: "At Kona Wa Sanbaa" }],
        //         title: "Volunteering",
        //     },
        // ],
    }),
};
</script>
