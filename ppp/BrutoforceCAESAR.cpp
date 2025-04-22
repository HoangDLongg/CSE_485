//Lap trinh be khoa mat ma CAESAR bang phuong phap Bruto-force.
//Dau vao CT la chuoi ki tu Cipher text thu duoc tu bai CAESAR.
//Hay xac dinh khoa K da su dung va noi dung cua plain text ban dau.
#include<iostream>
#include<string>
using namespace std;
int KT_S(char c){
	return c - 'A';
}
char S_KT(int n){
	return 'A' + n;
}
int main(){
	string P, C;
	int k;
	cout<<"Nhap chuoi Cipher Text: "; getline(cin, C);
	for(k = 1; k <= 25; k++){
		P="";
		for(int i = 0; i < C.size(); i++){
			int c = KT_S(C[i]);
			int p = (c - k + 26) % 26;
			P += S_KT(p);
		}
		cout<<"Chuoi Plain Text cua khoa K =  "<< k << " la: "<< P << endl;
	}
}
