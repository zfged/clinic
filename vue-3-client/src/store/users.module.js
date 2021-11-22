import { userService } from '../services';
export const users = {
    namespaced: true,
    state: () => ({
        users: []
    }),
    actions: {
        async initUsers({ commit }) {
            const users = await userService.users()
            commit('setUsers',users)
            return users
        },
    },
    mutations: {
        getAllRequest(state) {
            state.all = { loading: true };
        },
        getAllSuccess(state, users) {
            state.all = { items: users };
        },
        getAllFailure(state, error) {
            state.all = { error };
        },
        setUsers(state,users){
            state.users = users
        }
    }
}
