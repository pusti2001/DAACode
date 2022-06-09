#include <bits/stdc++.h>
using namespace std;

bool isSafe(int **arr, int x, int y, int n)
{
    for (int row = 0; row < x; row++)
    {
        if (arr[row][y] == 1)
            return false;
    }
    int row = x, col = y;
    while (row >= 0 && col >= 0)
    {
        if (arr[row][col] == 1)
            return false;
        row--;
        col--;
    }
    row = x, col = y;
    while (row >= 0 && col < n)
    {
        if (arr[row][col] == 1)
            return false;
        row--;
        col++;
    }

    return true;
}

void NQueen(int **arr, int x, int n)
{
    for (int col = 0; col < n; col++)
    {
        if (x >= n)
        {
            string soln = "";
            for (int i = 0; i < n; i++)
                for (int j = 0; j < n; j++)
                    if (arr[i][j] == 1)
                        soln = soln + to_string(j + 1);
            cout << soln << endl;
            break;
        }
        else if (isSafe(arr, x, col, n))
        {
            arr[x][col] = 1;
            NQueen(arr, x + 1, n);
            arr[x][col] = 0;
        }
    }
}

int main()
{
    int n = 4;
    int **arr = new int *[n];
    for (int i = 0; i < n; i++)
    {
        arr[i] = new int[n];
        for (int j = 0; j < n; j++)
        {
            arr[i][j] = 0;
        }
    }
    NQueen(arr, 0, n);

    return 0;
}