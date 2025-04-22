#include <iostream>
#include <string>
using namespace std;

char M[5][5];

int row(char c) {
    for (int i = 0; i < 5; i++)
        for (int j = 0; j < 5; j++)
            if (M[i][j] == c) return i;
    return 0;
}

int col(char c) {
    for (int i = 0; i < 5; i++)
        for (int j = 0; j < 5; j++)
            if (M[i][j] == c) return j;
    return 0;
}

int main() {
    string key = "MONARCHY";
    string alpha = "ABCDEFGHIKLMNOPQRSTUVWXYZ";
    string temp = "";

    //xu ly ki tu trung lap
    for (int i = 0; i < key.size(); i++)
        if (temp.find(key[i]) == string::npos) temp += key[i];
    for (int i = 0; i < alpha.size(); i++)
        if (temp.find(alpha[i]) == string::npos) temp += alpha[i];

    cout << "Khoa sau xu ly: " << temp << endl;

    //tao ma tran khoa
    int k = 0;
    for (int i = 0; i < 5; i++)
        for (int j = 0; j < 5; j++)
            M[i][j] = temp[k++];

    cout << "\nMa tran khoa:\n";
    for (int i = 0; i < 5; i++) {
        for (int j = 0; j < 5; j++)
            cout << M[i][j] << " ";
        cout << endl;
    }

    string p;
    cout << "\nNhap chuoi can ma hoa: ";
    cin >> p;

    if (p.size() % 2 != 0) p += 'X';

    //ma hoa
    string c = p; 
    for (int i = 0; i < p.size(); i += 2) {
        char a = p[i], b = p[i + 1];
        int ra = row(a), ca = col(a);
        int rb = row(b), cb = col(b);

        if (ra == rb) { 
            p[i] = M[ra][(ca + 1) % 5];
            p[i + 1] = M[rb][(cb + 1) % 5];
        } else if (ca == cb) {
            p[i] = M[(ra + 1) % 5][ca];
            p[i + 1] = M[(rb + 1) % 5][cb];
        } else { 
            p[i] = M[ra][cb];
            p[i + 1] = M[rb][ca];
        }
    }

    cout << "\nChuoi ma hoa: " << p << endl;

    //giai ma
    string g = p;
    for (int i = 0; i < p.size(); i += 2) {
        char a = p[i], b = p[i + 1];
        int ra = row(a), ca = col(a);
        int rb = row(b), cb = col(b);

        if (ra == rb) { 
            g[i] = M[ra][(ca - 1 + 5) % 5]; 
            g[i + 1] = M[rb][(cb - 1 + 5) % 5];
        } else if (ca == cb) { 
            g[i] = M[(ra - 1 + 5) % 5][ca]; 
            g[i + 1] = M[(rb - 1 + 5) % 5][cb];
        } else { 
            g[i] = M[ra][cb];
            g[i + 1] = M[rb][ca];
        }
    }

    cout << "\nChuoi giai ma: " << g << endl;

    return 0;
}
