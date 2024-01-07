import time

def mod_inverse(a, m):
    for x in range(1, m):
        if (a * x) % m == 1:
            return x
    return None

def affine_cipher_decrypt(ciphertext, a, b):
    m = 26  # Size of the alphabet (assuming English alphabet)
    inverse_a = mod_inverse(a, m)
    if inverse_a is None:
        return "Error: The multiplicative key does not have an inverse."

    plaintext = ""
    for char in ciphertext:
        if char.isalpha():
            if char.islower():
                # Decrypt lowercase letters
                decrypted_char = chr(((ord(char) - ord('a') - b) * inverse_a) % m + ord('a'))
            else:
                # Decrypt uppercase letters
                decrypted_char = chr(((ord(char) - ord('A') - b) * inverse_a) % m + ord('A'))
        else:
            # Leave non-alphabetic characters unchanged
            decrypted_char = char
        plaintext += decrypted_char
    return plaintext

# Capture start time
start_time = time.time()

# Example usage for decryption
ciphertext = "Wv zrc pcwmv ah zrc hiqaeu Gwvm Cxoipx WWW zrcpc oiu i lwzzlc nay sillcx Xwsg Orwzzwvmzav, orauc hizrcp ivx qazrcp xwcx orcv rc oiu jcpy yaevm. Iu faap Xwsg oiu vaz alx cvaemr za oapg, rc oiu jcpy nixly ahh; rc maz nez lwzzlc hap rwu xwvvcp, ivx uaqczwqcu vazrwvm iz ill hap rwu npcighiuz - hap zrc fcaflc ora lwjcx wv zrc jwllimc ocpc jcpy faap wvxccx, ivx saelx vaz ufipc rwq qesr qapc zriv zrc fipwvmu ah fazizacu, ivx vao ivx zrcv i ripx speuz ah npcix."
a = 5  # Multiplicative key
b = 8  # Additive key
decrypted_text = affine_cipher_decrypt(ciphertext, a, b)

# Capture end time
end_time = time.time()

elapsed_time = end_time - start_time

print("Decrypted Text:", decrypted_text)
print("Elapsed Time: {:.6f} seconds".format(elapsed_time))
