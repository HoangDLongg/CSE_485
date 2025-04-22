#include<iostream>
using namespace std;

int main() {
	char K;
	string P, C;	
	cout << "Nhap plaintext: "; getline(cin, P);
	C = P; 
	cout << "Nhap chuoi khoa K: "; cin >> K;
	
	//ma hoa
	for(int i = 0; i < P.size(); i++) {
		C[i] = P[i] ^ K;
	} 
	cout << "Chuoi ma hoa (dang ma ASCII): ";
	for(int i = 0; i < C.size(); i++) {
		cout << (int)C[i] << " ";
	}
	
	//giai ma
	for(int i = 0; i < P.size(); i++) {
		P[i] = C[i] ^ K;
	} 
	cout << endl << "Chuoi giai ma: " << P << endl;

	return 0;
}

