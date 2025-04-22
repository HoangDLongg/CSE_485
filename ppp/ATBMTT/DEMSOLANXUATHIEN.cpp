#include <iostream>
#include <string>

using namespace std;

int main() {
    string str;
    cout << "Nhap doan van ban: ";
    getline(cin, str);

    int count[256] = {0};
    for (int i = 0; i < str.size(); i++) {
        count[(unsigned char)str[i]]++;
    }

    cout << "Tan suat xuat hien cua cac ky tu:" << endl;
    for (int i = 0; i < 256; i++) {
        if (count[i] > 0) {
            cout << char(i) << ": " << count[i] << endl;
        }
    }

    return 0;
}

