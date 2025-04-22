#include<iostream>
using namespace std;

int main() {
	string P, C, K;
	string B = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	cout << "Nhap chuoi: "; getline(cin, P);
	cout << "Nhap chuoi khoa K: "; getline(cin, K);
	
	// ma hoa
	for(int i=0; i<P.size(); i++) {
		int j=B.find(P[i]);	
		C += K[j];
	}
	cout << "Chuoi ma hoa: " << C;
	
	P="";
	// giai ma
	for(int i=0; i<C.size(); i++) {
		int j = K.find(C[i]);
		P+=B[j]; 
	}
	cout << endl << "Chuoi ban dau: " << P;
	return 0;
}

