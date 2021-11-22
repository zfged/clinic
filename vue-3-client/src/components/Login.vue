<template>
    <div>
     	<div class="background"></div>
			<div class="logo"><img src="../assets/logo.png" alt="logo"></div>
			<form @submit.prevent="handleSubmit">
				<div class="form">
							<div class="title">ВХОД</div>
								<img src="../assets/venzil.png" alt="venzil">
								<input type="text" v-model="username" name="username" class="login" :class="{ 'is-invalid': submitted && !username }" placeholder="email">
								<div v-show="submitted && !username" class="invalid-feedback">Username is required</div>
								<input  type="password" v-model="password" name="password" class="password" placeholder="password" :class="{ 'is-invalid': submitted && !password }">
								<div v-show="submitted && !password" class="invalid-feedback">Password is required</div>
								<button :disabled="loggingIn">ВХОД</button>
								<img v-show="loggingIn" src="data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==" />
								<div class="message">
							</div>
				</div>
			</form>
    </div>
</template>

<script>
export default {
    data () {
        return {
            username: '',
            password: '',
            submitted: false
        }
    },
    computed: {
        loggingIn () {
            return this.$store.state.authentication.status.loggingIn;
        }
    },
    created () {
        // reset login status
        this.$store.dispatch('authentication/logout');
    },
    methods: {
        handleSubmit () {
            this.submitted = true;
            const { username, password } = this;
            const { dispatch } = this.$store;
            if (username && password) {
                dispatch('authentication/login', { username, password });
            }
        }
    }
};
</script>