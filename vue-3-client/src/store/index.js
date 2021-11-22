
import { createStore } from "vuex";
import { alert } from './alert.module';
import { authentication } from './authentication.module';
import { users } from './users.module';

const store = createStore({
  modules: {
    alert,
    authentication,
    users
  },
});

export default store;