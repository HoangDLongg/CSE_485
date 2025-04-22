#include <iostream>
#include <string>
using namespace std;

int main() {
    string s;
    cout << "Nhap van ban: ";
    getline(cin, s);  // Nh?p c? dòng

    int freq[256] = {0};  // M?ng d?m t?n su?t (cho 256 ký t? ASCII)

    // Ð?m t?n su?t xu?t hi?n
    for (int i = 0; i < s.length(); i++) {
        char c = s[i];
        freq[(int)c]++;
    }

    cout << "\nT?n su?t xu?t hi?n c?a các ký t?:\n";
    for (int i = 0; i < 256; i++) {
        if (freq[i] > 0) {
            if (i == 32)  // mã ASCII c?a d?u cách
                cout << "[space] : " << freq[i] << endl;
            else
                cout << "'" << (char)i << "' : " << freq[i] << endl;
        }
    }

    return 0;
}

