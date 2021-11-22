<template>
    <div>
      <div v-if="alertMessage" :class="`alert ${alertType}`">{{alertMessage}}</div>
      <router-view></router-view>       
    </div>
</template>

<script>
export default {
    name: 'app',
    computed: {
        alertType () {
            return this.$store.state.alert.type
        },
        alertMessage () {
            return this.$store.state.alert.message
        }
    },
    watch:{
        $route (){
            // clear alert on location change
            this.$store.dispatch('alert/clear');
        }
    } 
};
</script>