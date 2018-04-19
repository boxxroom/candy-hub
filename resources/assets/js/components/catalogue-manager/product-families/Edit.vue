<script>

    export default {
        data() {
            return {
                family : {},
                loaded: false,
                translating: false,
                languages: [],
                translationLanguage: locale.current(),
                params: {
                    includes: 'attributes'
                }
            }
        },
        props: ['id'],
        mounted() {
            this.loadLanguages();
            this.load();
        },
        methods: {
            load() {
                apiRequest.send('get', '/product-families/' + this.id, [], this.params)
                    .then(response => {
                        this.family = response.data;
                        console.log(response);
                        // this.fields['name'] = {
                        //     value: this.group.name,
                        //     type: 'text',
                        //     translatable: true
                        // };
                        // this.attributes = this.group.attributes.data;
                        this.loaded = true;
                    });
            },
            loadLanguages() {
                apiRequest.send('get', 'languages', [], []).then(response => {
                    response.data.forEach(lang => {
                        this.languages.push({
                            label: lang.name,
                            value: lang.lang,
                            content: '<span class=\'flag-icon flag-icon-' + lang.iso + '\'></span> ' + lang.name
                        });
                    });
                });
            }
        }
    }
</script>

<template>
    <div>
        <template v-if="loaded">
            <candy-tab name="Product Details" :selected="true" dispatch="product-details">

            </candy-tab>
        </template>
        <div v-else>
            <div class="page-loading loading">
                <span><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></span> <strong>Loading</strong>
            </div>
        </div>
    </div>
</template>