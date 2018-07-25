import state from './state'
import mutations from './mutations'

const store = new window.vuex.Store({
    state,
    mutations,
});

export default store;
