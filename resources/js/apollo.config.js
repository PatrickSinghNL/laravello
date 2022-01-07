import Vue from 'vue';
import { ApolloClient, createHttpLink, InMemoryCache } from '@apollo/client/core'
import VueApollo from 'vue-apollo';

Vue.use(VueApollo);



// HTTP connection to the API
const httpLink = createHttpLink({
  // You should use an absolute URL here
  uri: 'http://laravello.test/graphql'
})

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
  link: httpLink,
  cache,
})

export default new VueApollo({
    defaultClient: apolloClient
});
