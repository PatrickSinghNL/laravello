<template>
    <div class="h-full flex flex-col items-stretch bg-purple-500">
        <div
            class="header text-white flex justify-between items-center mb-2 bg-purple-600"
        >
            <div class="ml-2 w-1/3">X</div>
            <div class="text-lg opacity-50 cursor-pointer hover:opacity-75">
                Laravello
            </div>
            <div class="mr-2 w-1/3 flex justify-end">X</div>
        </div>

        <div class="h-full flex flex-1 flex-col items-stretch">
            <div class="mx-4 mb-2 text-white font-bold text-lg">
                <span v-if="$apollo.queries.board.loading">Loading ...</span>
                <span v-else>{{ board.title }}</span>
            </div>
            <div class="flex flex-1 items-start overflow-x-auto mx-2" v-if="board">
                <list :list="list" v-for="list in board.lists" :key="list.id"></list>
            </div>
        </div>
    </div>
</template>

<script>
import gql from "graphql-tag";
import List from "./components/List";
import BoardQuery from "./graphql/BoardWithListsAndCards.gql";

export default {
    components: {
        List,
    },
    apollo: {
        board: {
            query: BoardQuery,
            variables: {
                id: 1,
            },
        },
    },
};
</script>

<style scoped>
.header {
    height: 40px;
}
</style>
