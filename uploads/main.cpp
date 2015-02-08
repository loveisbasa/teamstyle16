#include "./header/hw1.h"

int main()
{
    vector<int64_t> collatz_token;
    int64_t temp;
    int k;
    
    cin >> temp >> k;
    collatz_token.push_back(temp);
    while (temp > 1) {
        switch(IsOdd(temp)) {
        case 1: temp = 3 * temp + 1; break;
        case 0: temp /= 2; break;
        }
        collatz_token.push_back(temp);
    }
    vector<int64_t>::iterator head_iter = collatz_token.begin();
    vector<int64_t>::iterator end_iter = collatz_token.end() - 1;
    printf_int64(K_Sort(collatz_token.size()-k+1, collatz_token.size(), end_iter, head_iter));
    return 0;
}

int Partition(vector<int64_t>::iterator move_iter, vector<int64_t>::iterator fixed_iter)
{
    int64_t key = *fixed_iter;
    vector<int64_t>::iterator tail = move_iter;
    int big_num = 0;
    while (*move_iter  != *fixed_iter) {
        if (*move_iter < *fixed_iter) {
            exchange(move_iter, tail);
            --tail;
            ++big_num;
        }
        --move_iter;
    }
    exchange(fixed_iter, tail);
    return big_num;
}

int64_t K_Sort(int k, int total, vector<int64_t>::iterator move_iter, vector<int64_t>::iterator fixed_iter)
{
    int small_token_num = Partition(move_iter, fixed_iter);
    if (fixed_iter == move_iter)
        return *(fixed_iter);
    else if (small_token_num >= k)
        return K_Sort(k, small_token_num, move_iter , fixed_iter + total - small_token_num);
    else
        return K_Sort(k-small_token_num, total - small_token_num, move_iter - small_token_num, fixed_iter);
}


